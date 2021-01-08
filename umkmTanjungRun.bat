@echo off
cd /
cd xampp
start xampp-control.exe
cd /
cd Users/%username%
rem start visual
start xampp
cd umkmTanjung
start chrome http://localhost:8080
php spark serve
