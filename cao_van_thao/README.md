# php2104_php
Branch:
- git branch // Hiển thị ds các nhánh ở trên local
- git branch -a // Hiển thị ds các nhánh ở trên local và remote
- git checkout -b <branch_name> // Tạo nhánh mới, và chuyển sang nhánh mới
- git switch -c <branch_name> // Tạo nhánh mới, và chuyển sang nhánh mới
- git branch <branch_name> // Tạo nhánh mới và vẫn ở nhánh hiện tại
- git checkout <branch_name> // chuyển nhánh

Remote:
- git remote add <remote_name> <url> // thêm remote mới
- git remote -h // hiện thị help

Push:
- git push <remote_name> <branch_name>

Pull:
- git pull <remote_name> <branch_name>

Commit:
- git add <path>
- git add . // thêm tất cả các thay đổi vào state
- git checkout <path> // bỏ các thay đổi
- git checkout -f // bỏ tất cả các thay đổi
- git commit 
- git commit -m "<commit_content>"
- git commit --amend // Bị quên file
- git commit --amend --no-edit // bị quên file và ko cần sửa nội dung commit

