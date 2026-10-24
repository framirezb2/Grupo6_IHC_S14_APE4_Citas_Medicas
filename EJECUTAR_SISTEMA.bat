@echo off
title Sistema de Citas Medicas - Portable
color 0A
echo ========================================================
echo        INICIANDO SISTEMA DE CITAS MEDICAS PORTABLE
echo ========================================================
echo.
echo Abriendo el navegador en http://localhost:8000 ...
start http://localhost:8000
echo.
echo Iniciando servidor PHP integrado desde la carpeta local...
cd /d %~dp0
php\php.exe -S localhost:8000
pause