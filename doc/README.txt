--------------------------------------------------------------------------------------------------------------------------------------------------------------
Testing process: 	
--------------------------------------------------------------------------------------------------------------------------------------------------------------
	- Bugs/Issues were initially tracked in Jira, but this last week we transitioned to using Github's Issue tracking in our Github repository. Which you have access to.
	- Our Jira is currently no longer in use.
	- Our main form of communication for development was slack where we kept each other updated on our progress and also a discord channel.
	- When bugs/issues were discovered they were first discussed among the group members in our slack development channel.
		- If the bug/issues were a typo or missing bracket etc, it was fixed almost instantaneously (a simple syntax mistake, missing parenthesis etc.)
		- If the bug/issues were more complicated and required new checks, tests, or functionality, then they were recorded by the finder in the Issues section of our Github repository.
		-The users who were assigned to those particular stories that had bugs/issues would then solve the bugs and then test to make sure that the issues had been solved.
		- when the issues were solved, the person who had implemented the fix would close the issue tracking on the github repository.
		- as explained during the demo, we should have been recording the times it took to solve each individual issue here, but we didn't. This is something we will improve on in future sprints/releases.

Our tracked isues on github:
"https://github.com/tross78/IFB299/issues"


--------------------------------------------------------------------------------------------------------------------------------------------------------------
Manager Login: 
--------------------------------------------------------------------------------------------------------------------------------------------------------------
Our site URL:"https://teamhawk-meditation-centre.herokuapp.com/"

Users can create a new login whenever they want, but they only have the privileges of new students.

It would be beneficial to you as the marker to have access to an account with manager privileges where you can access all the data. Below is the account information for one of our manager accounts.

username: fflintstone
password: 123

When logged in with that account you will be able to see all of the courses and enrolments, and enrol in a course in any role (student, assistant-teacher, kitchen-helper, manager). The only minor issue with having access to everything is that at the moment, managers can enrol into courses of the opposite gender. In theory this shouldn't be possible but we haven’t implemented a gender check for managers at this point because we still want them to have total access for testing purposes.

Also, there is a third privilege rank there are managers and new students (which we demonstrated both), but there are also old students who are students who have completed at least one 10-day course. Old students can enroll in the 3 and 30 day courses, and can also enroll as 2 extra roles: (student, manager). But they don't have the ability to add/edit/delete courses like managers do, and they can only see the courses they are enrolled in, unlike managers who can see all enrolments.


--------------------------------------------------------------------------------------------------------------------------------------------------------------
What is implemented: 
--------------------------------------------------------------------------------------------------------------------------------------------------------------
As far as what is implemented thus far, refer to the sprint and release plan. That document is current and has the tasks recorded with hours estimated and taken for each. As seen on that document, all tasks except for the last two of the final sprint 2/release one user story (37: Course Applicant Waiting List: T26, T27). The main reason is due to time restraints, but upon reflection it is clear that these tasks should have been split up and separated into their own user stories and pushed back to release two/sprint 3. - as explained at begining of demonstration.