- The utility is a mini no framework custom PHP RESTful API. In order to get info for a day an URL like 
"api/url/words/2023-07-25" should be used.
- If no date param is passed in URL and URL is like "api/url/words" than all words will be returned. In this case a
pagination which is not implemented is needed.
- In order to run the utility daily in an automated fashion the crontab will be used. An entry will be added using 
"crontab -l" command, here is an example: "0 4 * * * php /server/path/to/cron/get_daily_words.php".
- "cron/get_daily_words.php" makes a curl call to api for the current date in the above example every day at 4am.
- One option to deploy the code to production is by using GitHub pipelines. In order to automate the deployment so each push to your
default branch will trigger a deployment to your production environment GitHub actions can be used.