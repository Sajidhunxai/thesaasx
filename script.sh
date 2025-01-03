#!/bin/bash
# Start date for August 2024
start_date="2024-07-02 00:00:00"
# Set the number of commits to make
num_commits=3
# Commit message (you can customize this if needed)
commit_message="lawnpro"
# Loop to create the commits
for i in $(seq 1 $num_commits)
do
    # Modify a file for each commit, appending a new line with the commit number
    echo "Commit #$i on $(date -d "$start_date + $i days" +"%Y-%m-%d %H:%M:%S")" >> commit_log.txt
    git add commit_log.txt
    # Set the custom commit date for each commit
    commit_date=$(date -d "$start_date + $i days" +"%Y-%m-%d %H:%M:%S")
    # Commit with the custom date
    GIT_AUTHOR_DATE="$commit_date" GIT_COMMITTER_DATE="$commit_date" git commit --no-edit --date "$commit_date" -m "$commit_message"
done
# Push all commits to the repository at once
git push origin main --force