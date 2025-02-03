(refer to README.pdf in repository for more details and pictures)
# VolleyBuddy

VolleyBuddy is a web application that allows users to create an account, add custom players, and generate randomized and balanced volleyball teams. It provides features such as editing and deleting players and allows users to create a custom number of teams effectively.

## Technologies Used
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP, MySQL
- **Database Management:** phpMyAdmin
- **Server:** Apache (via XAMPP)

## Installation and Setup

### Prerequisites
- Install **XAMPP**, which includes Apache and MySQL.
- Download the project files.

### Installing XAMPP
1. Visit the official [XAMPP website](https://www.apachefriends.org/index.html) and download the latest version for your OS.
2. Run the installer and follow the instructions. Ensure **Apache** and **MySQL** are selected.
3. Launch the XAMPP control panel and start **Apache** and **MySQL**.
4. Open a browser and visit http://localhost to verify installation.

### Setting Up the Database
1. Move the project folder to the htdocs directory in XAMPP.
2. Open phpMyAdmin by clicking the ‘Admin’ button next to MySQL in XAMPP or navigating to http://localhost/phpmyadmin/.
3. Click on **New** to create a new database.
4. Name the database volleyball_database and click **Create**.
5. Navigate to the **Import** tab.
6. Select the volleyball_database.sql file from the project folder.
7. Click **Import** to load the database schema.

## Running the Application
1. Open a browser and go to http://localhost/Volleyball_Prototype/view/login.php.
2. **Create an account** by clicking ‘Create Account’, filling out the form, and selecting ‘Sign Up’.
3. **Create Players:** Use the navigation bar or ‘Start Now’ button on the homepage.
4. **View Players:** Click the ‘View Players’ button under the ‘Players’ section.
   - Delete players using the trash icon.
   - Edit players using the pencil icon.
5. **Modify Players:**
   - Click the edit icon.
   - Adjust name or skill levels (now rated 1-10).
   - Click ‘Edit Player’ to save changes.
6. **Create Teams:**
   - Click the ‘Create Team’ button in the navigation bar.
   - Select players to be included.
   - Choose the number of teams.
   - Click ‘Generate Teams’ to view balanced teams.

## Project Improvements
- **View Players Page:** Displays all created players.
- **Editable & Deletable Players:** Users can modify or remove players as needed.
- **Improved UI & Instructions:** The ‘Create Team’ page now provides clearer explanations.
- **User Accounts:** Players are saved uniquely per user.
- **Navigation Improvements:** Menu links are reordered for better usability.
- **Expanded Skill Ratings:** Skill levels changed from **1-5** to **1-10** for better differentiation.
- **Clickable Home Icon:** Navigation improvement for user experience.

## Contributing
Feel free to fork the project, create feature branches, and submit pull requests. Suggestions and improvements are always welcome!
