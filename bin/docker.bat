@echo off
for /f "delims=[] tokens=2" %%a in ('ping -4 -n 1 %ComputerName% ^| findstr [') do set NetworkIP=%%a
set REMOTE_HOST_DBG=%NetworkIP%
set COMPOSE_PROJECT_NAME=api

docker-compose up --build