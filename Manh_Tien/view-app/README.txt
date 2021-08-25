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
- name git :BM-Tien
- pass 
- mã : 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


- sửa lỗi ko có âm thanh alsamixer

-checkout sang nhánh main
-kéo code mới nhất từ upstream về
-tạo nhánh laravel2
-copy code vào nhánh laravel2 này
-commit
-push

-mở laravel npm run dev   => php artisan serve --port=8000

-mở php  php -S localhost:8080

- mở mysql mysql -u root -p
-cài lại pass sudo mysql --user=root mysql
UPDATE mysql.user SET authentication_string=null WHERE User='root';
flush privileges;
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'your_password_here';
flush privileges;

-check phiên bản : composer --version , php -v , mysql --version

https://docs.github.com/en/github/collaborating-with-pull-requests/reviewing-changes-in-pull-requests/checking-out-pull-requests-locally

