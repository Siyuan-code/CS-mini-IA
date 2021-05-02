# CS-mini-IA

Mini IA
Basic Version

Your client is the IB Coordinator whose role it is to link up all the students with EE advisors. She does this manually for the most part using spreadsheets and google forms. However, it can be streamlined.

We will create a form that will allow students to submit their information to a DB.
Name
Email Address
EE Subject
Grade in the course (If Math EE, Math grade)

We will create a form that will allow teachers to submit their information to a DB.
Name
Email Address
EE Subject 1st Choice
EE Subject 2nd Choice

PHASE 1
Create a table for the students
Add some dummy data (~20 entries should be fine)...limit your subjects to say 5
Tally how many students are taking each subject
Start by trying to query the database for students taking 1 subject
You will then use the while loop to count the results
Then you will have 2 loops, the outer loop that iterates through subjects and the inner loop that iterates through student records. Count can be stored in an array (or an associative array)
Display the top three most popular EE subjects
List students who have a D or an F in the chosen subject
Search for a particular student and display their choice

PHASE 2
Create a table for the teachers
List the EE subjects with the fewest teachers as their 1st choice
Search for a teacher by name and display their 2 choices
List all teachers who have selected Math as their 2nd choice
(query using “where” column 2nd is equal to “Math”)

Things to cover before Phase 3 briefly
Relational DB
Using IDs

PHASE 3
Create a 3rd table that will hold the assignment (student/advisor/subject)
Add a column to the teacher table called “Assigned”

Write an algorithm that will iterate through the students and assign them to an advisor.

Just loop once checking the first student’s subject and matching that person to the first available teacher (1st choice).

Example: If Comp Sci is their choice, the algo will find that Ghosn has Comp Sci as their 1st choice and will assign a student to that subject.

When found, INSERT that teacher’s name (or ID) to the table

Now loop through all students, still checking only the 1st Choice, and INSERT the teacher AND add 1 to the assigned column

Now write a nested loop inside the loop that essentially checks IF 1st choice is iterated through OR teacher has more than 3 ASSIGNED, then move on to 2nd Choice

Flag: Use of a flag or pointer here is crucial. Something like a boolean that says

If Ghosn’s “Assigned” value is greater than 4, then it has to search for teachers who have Comp Sci as their 2nd choice.

Things to figure out after this is done
Dynamic Dropdowns
