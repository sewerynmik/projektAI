git init
git config --local user.name "student"
git config --local user.email "student@ur.edu.pl"
git add --all
git commit -m "projekt"
git archive --format=zip HEAD -o ../projekt.zip
pause
