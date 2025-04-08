@echo off
echo Starting Frontend (Vue 3) and Backend (Laravel)...

cd web-ui
start /b "" npm run dev
echo Vue 3 Frontend started on http://localhost:5173
timeout /t 2 /nobreak

start /b "" php artisan serve --port=8080
echo Laravel web-ui started on http://127.0.0.1:8080
timeout /t 2 /nobreak

cd ..\backend
start /b "" php artisan serve --port=8000
echo Laravel Backend started on http://127.0.0.1:8000

echo.
echo All services should now be running in this window.
echo - Frontend: http://localhost:5173
echo - web-ui Backend: http://127.0.0.1:8080
echo - Backend: http://127.0.0.1:8000
echo.
echo Press Ctrl+C to stop all services and close this window...
pause