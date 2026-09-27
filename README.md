Website Công thức Nấu ăn

1. Giới thiệu

Website Công thức Nấu ăn được triển khai bằng Docker Compose, tích hợp MySQL, phpMyAdmin, Nginx Reverse Proxy, Prometheus, Grafana, Loki và Promtail.

2. Công nghệ

WordPress

MySQL 8.0

phpMyAdmin

Nginx

Prometheus

Grafana

cAdvisor

MySQL Exporter

Nginx Prometheus Exporter

Loki

Promtail

Docker Compose

GitHub

3. Cấu trúc thư mục

recipe-website/
├── nginx/
│   └── nginx.conf
├── prometheus/
│   └── prometheus.yml
├── loki/
│   └── loki-config.yml
├── promtail/
│   └── promtail-config.yml
├── docker-compose.yml
└── README.md

4. Chạy hệ thống

Yêu cầu: Docker Desktop và Git.

cd C:\recipe-website
docker compose up -d
docker compose ps

5. Truy cập

Thành phần

Địa chỉ

Website

http://localhost:8080

phpMyAdmin

http://localhost:8081

Prometheus

http://localhost:9090

Grafana

http://localhost:3000

Loki kiểm tra trạng thái

http://localhost:3100/ready

6. Kiến trúc

Người dùng → Nginx → WordPress → MySQL

cAdvisor ─────────┐
MySQL Exporter ───┼→ Prometheus → Grafana
Nginx Exporter ───┘

Docker Containers → Promtail → Loki → Grafana

7. Git Commit

Commit 1: Add Nginx reverse proxy and security headers

Commit 2: Add Prometheus and Grafana monitoring

Commit 3: Add Loki Promtail and LogQL

8. LogQL

Các truy vấn đã kiểm tra thành công trong Grafana Explore:

{container="recipe-wordpress"}

{container="recipe-nginx"}

9. Hardening

Network isolation bằng Docker network recipe_network.

Mật khẩu MySQL mạnh.

Hạn chế quyền bằng volume cấu hình :ro khi phù hợp.

Một số container chạy non-root.

Nginx sử dụng security headers: X-Frame-Options, X-Content-Type-Options, Referrer-Policy.

10. Dừng hệ thống

docker compose down

Khởi động lại:

docker compose up -d