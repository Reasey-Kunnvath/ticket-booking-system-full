@echo off
echo Starting Frontend (Vue 3) and Backend (Laravel)...

start cmd /k "cd web-ui && npm run dev"
start cmd /k "cd web-ui && php artisan serve --port=8080"
timeout /t 2 /nobreak

start cmd /k "cd backend && php artisan serve --port=8000"

echo.
echo Both frontend and backend should now be running.
echo - Frontend: http://localhost:5173
echo - Backend: http://127.0.0.1:8000
echo Press any key to close this window...
pause