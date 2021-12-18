# Project 3
+ By: Abdell Gautier
+ URL: <http://e2p3.abdellgautier.com>

## Graduate requirement
+ [x] I have integrated testing into my application
+ [ ] I am taking this course for undergraduate credit and have opted out of integrating testing into my application

## Outside resources
+ https://makitweb.com/how-to-store-array-in-mysql-with-php/ - For saving arrays into mySql

...and...

Same as Project 2:
+ https://en.wikipedia.org/wiki/Battleship_(game)
+ https://materializecss.com/
+ https://cssgradient.io/
+ https://codepen.io/ryandsouza13/pen/yEBJQV
+ https://www.joshwcomeau.com/animation/3d-button/
+ https://www.florin-pop.com/blog/2019/03/css-pulse-effect/

## Notes for instructor
+ https://codeception.com/docs/reference/Commands - Helped me resolve an issue where I manually deleted some ...Cest files that were no longer needed and I got errors when running the command:
```
php vendor/bin/codecept run acceptance --steps
```

The command that helped me solve the issue was:
```
php vendor/bin/codecept clean
```

+ I serialized and stored the game boards associative arrays in the database > rounds table. I know it's not elegant to tightly-couple them that way, but it really made my job easier than just saving a record per missile launch into the db.

## Codeception testing output
```
Codeception PHP Testing Framework v4.1.23
Powered by PHPUnit 9.5.10 by Sebastian Bergmann and contributors.

Acceptance Tests (11) ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
HistoryPageCest: Page loads
Signature: HistoryPageCest:pageLoads
Test: tests/acceptance/HistoryPageCest.php:pageLoads
Scenario --
 I am on page "/history"
 I see "Game History","h2"
 I see element "[test=lnkRound]"
 I see element "[test=btnGoBack]"
 PASSED 

HistoryPageCest: Page works
Signature: HistoryPageCest:pageWorks
Test: tests/acceptance/HistoryPageCest.php:pageWorks
Scenario --
 I am on page "/history"
 I click "[test=lnkRound]","(descendant-or-self::*[@test = 'lnkRound'])[position()=1]"
 I see "Game Information","h5"
 I click "[test=btnGameHistory]"
 I see "Game History"
 PASSED 

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
 I see element "#btnGameHistory"
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
 I click "[test=btnGameHistory]"
 I see "This page shows all games played by everyone."
 PASSED 

HomePageCest: Page validation works
Signature: HomePageCest:pageValidationWorks
Test: tests/acceptance/HomePageCest.php:pageValidationWorks
Scenario --
 I am on page "/"
 I fill field "[test=Player_Nickname]","BubbleBobbyTheTester"
 I click "[test=Difficulty-Hard]"
 I click "[test=btnPlayGame]"
 I see "BubbleBobbyTheTester"
 I am on page "/"
 I click "[test=btnGameHistory]"
 I see "This page shows all games played by everyone."
 PASSED 

NotFoundPageCest: Page loads
Signature: NotFoundPageCest:pageLoads
Test: tests/acceptance/NotFoundPageCest.php:pageLoads
Scenario --
 I am on page "/incredibly-rare-page-that-does-not-exist"
 I see in title "Submarine Attack - Page Not Found"
 I see "Page Not Found"
 I see element "[test=lnkHomePage]"
 PASSED 

NotFoundPageCest: Page works
Signature: NotFoundPageCest:pageWorks
Test: tests/acceptance/NotFoundPageCest.php:pageWorks
Scenario --
 I am on page "/incredibly-rare-page-that-does-not-exist"
 I click "[test=lnkHomePage]"
 I see in title "Submarine Attack"
 I see element "#btnPlayGame"
 I see element "#btnGameHistory"
 PASSED 

PlayPageCest: Page loads
Signature: PlayPageCest:pageLoads
Test: tests/acceptance/PlayPageCest.php:pageLoads
Scenario --
 I am on page "/"
 I fill field "[test=Player_Nickname]","MasterSubmarineSinker"
 I click "[test=Difficulty-Easy]"
 I click "[test=btnPlayGame]"
 I see "MasterSubmarineSinker"
 I see "Easy"
 I see element "[test=btnLaunchMissile]"
 PASSED 

PlayPageCest: Page works
Signature: PlayPageCest:pageWorks
Test: tests/acceptance/PlayPageCest.php:pageWorks
Scenario --
 I am on page "/"
 I fill field "[test=Player_Nickname]","MasterSubmarineSinker"
 I click "[test=Difficulty-Easy]"
 I click "[test=btnPlayGame]"
 I click "[test=btnLaunchMissile]"
 PASSED 

RoundPageCest: Page loads
Signature: RoundPageCest:pageLoads
Test: tests/acceptance/RoundPageCest.php:pageLoads
Scenario --
 I am on page "/history"
 I click "[test=lnkRound]"
 I see "Game Information","h5"
 PASSED 

RoundPageCest: Page works
Signature: RoundPageCest:pageWorks
Test: tests/acceptance/RoundPageCest.php:pageWorks
Scenario --
 I am on page "/history"
 I click "[test=lnkRound]","(descendant-or-self::*[@test = 'lnkRound'])[position()=1]"
 I see "Game Information","h5"
 I click "[test=btnGameHistory]"
 I see "Game History"
 PASSED 

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


Time: 00:00.390, Memory: 12.00 MB

OK (11 tests, 27 assertions)
```