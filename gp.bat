@echo off

echo Adicionando mudanças...
git add .

echo Agora, insira a mensagem do commit:
set /p commitMessage="Mensagem do commit: "

echo Realizando commit...
git commit -m "%commitMessage%"

echo Realizando push...
git push origin main

pause