# ALE Sandbox

Sandbox pro ALE framework (Nette framework s integrovanými částmi mého ALE "frameworku"). Sandbox přijímá všechny aspekty Nette, pouze rozšiřuje jeho funkčnost o několik dalších rozšíření. Dokumentace k jednotlivým částem viz v příslušných repozitářích.


## Základ

Jak jsem již uvedl základem je **Nette** framework, spolu s **Doctrine 2** rozšířenou pomocí **Kdyby/Doctrine**. Jedná se převážně o stable verze cizích balíčků. U vlastních používám @dev verze, vzhledem ke skutečnosti, že tento repozitář vyvíjím primárně pro sebe a na svých komponentech :)


## Rozšíření

- Základní součástí je z **ALE extension** viz: https://github.com/frosty22/Ale
- Dále z nejpodstatnějších je zde integrováno Kdyby/Dotrine, Kdyby/Events
- a mnoho dalších viz composer.json


## Selenium

Systému je připraven pro selenium testování (viz složka **tests/selenium**). Jednotlivé testy se umisťují do složky **AppTests** (případně pod adresářů) a mají příponu **phpt**. Každý test je samostatná třída pojmenovaná dle souboru a musí být potomkem třídy **BaseTest**.

BaseTest předepisuje metodu **run**, která přijímá jako argument **RemoteWebDriver**, což je instance hlavního objektu z **Facebook/WebDriver** a slouží pro manipulaci se Selenium servrem.

Pro spuštění je tedy potřeba stáhnout s spustit **Selenium Server Standalone**, který je možná stáhnout zde http://code.google.com/p/selenium/downloads/list. V defaultním spuštění poběží na localhost:4444, který je zároveň definován ve spouštěcím skripty **run.php**.

Poté je možné spustit všechny selenium testy spuštěním SH skriptu **run.sh**. Ten postupně spouští všechny testy z uvedené složky.




