*Any instructions/notes in italics should be removed from the template before submitting* 

# Project 3
+ By: Abdell Gautier
+ URL: <http://e2p3.abdellgautier.com>

## Graduate requirement
*x one of the following:*
+ [x] I have integrated testing into my application
+ [ ] I am taking this course for undergraduate credit and have opted out of integrating testing into my application

## Outside resources
*your list of outside resources go here*

## Notes for instructor
*any notes for me to refer to while grading; if none, omit this section*

## Codeception testing output
```
Codeception PHP Testing Framework v4.1.23
Powered by PHPUnit 9.5.10 by Sebastian Bergmann and contributors.

Acceptance Tests (2) --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
HomePageCest: Page loads
Signature: HomePageCest:pageLoads
Test: tests/acceptance/HomePageCest.php:pageLoads
Scenario --
 I am on page "/"
 I see in title "Submarine Attack"
 I see "Instructions"
 I see element "#Player_Nickname"
 I see element "#Difficulty"
 I see element "#btnPlayGame"
 I see element "#btnGames"
 PASSED 

HomePageCest: Page works
Signature: HomePageCest:pageWorks
Test: tests/acceptance/HomePageCest.php:pageWorks
Scenario --
 I am on page "/"
 I fill field "[test=Player_Nickname]","BubbleBobbyTheTester"
 I click "[test=Difficulty-Hard]"
 I click "[test=btnPlayGame]"
 I see "BubbleBobbyTheTester"
 I am on page "/"
 I click "[test=btnGames]"
 I see "This page shows all games played by everyone."
 PASSED 

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


Time: 00:00.140, Memory: 12.00 MB

OK (2 tests, 8 assertions)
```