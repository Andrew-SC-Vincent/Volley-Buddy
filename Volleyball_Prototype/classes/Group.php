<?php 
class Group {
    public $players;
    public $size;
    public $totalSkill;
    public $teamNum;
    public $balancedTeams;

    public function __construct($players) {
        $this->players = $players;
        $this->size = count($players);
        $this->totalSkill = $this->getTotalSkill();
        $this->teamNum = 0;
    }

    // Returns total skill of the group
    public function getTotalSkill() {
        $totalSkill = 0;
        foreach ($this->players as $player) {
            $totalSkill += $player->getSkill();
        }
        return $totalSkill;
    }

    public function getPlayers() {
        return $this->players;
    }

    public function getBalancedTeams() {
        return $this->balancedTeams;
    }

    // Team creation function
    public function createTeams($numTeams, $numResults = 5, $threshold = 3) {
        $players = $this->players;

        // Sort players by skill (highest first)
        usort($players, function($a, $b) {
            return $b->getSkill() <=> $a->getSkill();
        });

        $solutions = [];
        $attempts = 0;
        $maxAttempts = $numResults * 10; // Prevent infinite loops

        while (count($solutions) < $numResults && $attempts < $maxAttempts) {
            $attempts++;
            $teams = array_fill(0, $numTeams, []);
            $teamSums = array_fill(0, $numTeams, 0);

            // Shuffle players for variation
            $shuffledPlayers = $players;
            shuffle($shuffledPlayers);

            // Define team size limits
            $minPlayersPerTeam = floor(count($players) / $numTeams);
            $extraPlayers = count($players) % $numTeams; // Some teams get +1 player

            // Distribute players while keeping balanced sums & sizes
            foreach ($shuffledPlayers as $player) {
                $eligibleTeams = [];

                foreach ($teamSums as $index => $sum) {
                    if (count($teams[$index]) < $minPlayersPerTeam || 
                        (count($teams[$index]) == $minPlayersPerTeam && $extraPlayers > 0)) {
                        $eligibleTeams[] = $index;
                    }
                }

                // Pick best team among eligible ones
                if (!empty($eligibleTeams)) {
                    $teamIndex = $this->findMinSumTeam($eligibleTeams, $teamSums);
                    $teams[$teamIndex][] = $player;
                    $teamSums[$teamIndex] += $player->getSkill();

                    // If extra player is assigned, decrement count
                    if (count($teams[$teamIndex]) > $minPlayersPerTeam) {
                        $extraPlayers--;
                    }
                }
            }

            $maxDiff = max($teamSums) - min($teamSums);

            // Create a solution entry
            $solution = [
                'teams' => $teams,
                'sums' => $teamSums,
                'difference' => $maxDiff
            ];

            // Check if this solution is unique
            $isDuplicate = false;
            foreach ($solutions as $existingSolution) {
                if ($this->areTeamsSimilar($solution['teams'], $existingSolution['teams'])) {
                    $isDuplicate = true;
                    break;
                }
            }

            // Store valid solutions within threshold
            if (!$isDuplicate && $maxDiff <= $threshold) {
                $solutions[] = $solution;
            }
        }

        // Sort solutions by best balance (smallest difference first)
        usort($solutions, function($a, $b) {
            return $a['difference'] - $b['difference'];
        });

        //Sets balancedTeams to solutions
        $this->balancedTeams = $solutions;

        return $solutions;
    }

    // Find team index with lowest sum among eligible teams
    private function findMinSumTeam($eligibleTeams, $teamSums) {
        $minSum = PHP_INT_MAX;
        $bestTeam = $eligibleTeams[0]; // Default to first eligible team

        foreach ($eligibleTeams as $teamIndex) {
            if ($teamSums[$teamIndex] < $minSum) {
                $minSum = $teamSums[$teamIndex];
                $bestTeam = $teamIndex;
            }
        }
        return $bestTeam;
    }

    // Ensure teams are considered the same regardless of order
    private function areTeamsSimilar($teams1, $teams2) {
        foreach ($teams1 as &$team1) {
            usort($team1, function($a, $b) {
                return $a->getSkill() <=> $b->getSkill();
            });
        }
        foreach ($teams2 as &$team2) {
            usort($team2, function($a, $b) {
                return $a->getSkill() <=> $b->getSkill();
            });
        }
        sort($teams1);
        sort($teams2);
        return $teams1 == $teams2;
    }
}
?>