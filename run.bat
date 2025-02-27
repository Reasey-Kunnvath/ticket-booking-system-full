@echo off
echo Starting Frontend (Vue 3) and Backend (Laravel)...

start cmd /k "cd frontend && echo Frontend is running at http://localhost:5173 && pnpm dev"

timeout /t 2 /nobreak

start cmd /k "cd backend && echo Backend is running at http://127.0.0.1:8000 && php artisan serve"

echo.
echo Both frontend and backend should now be running.
echo - Frontend: http://localhost:5173
echo - Backend: http://127.0.0.1:8000
echo Press any key to close this window...
pause