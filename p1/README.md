# War (card game) Simulator
+ By: Abdell Gautier
+ URL: <http://e2p1.abdellgautier.com>

## Game planning
+ An array holds the initial deck of cards.
+ Shuffle the deck of cards.
+ Deal cards to each player, in an alternating sequence.
+ Each player then holds 26 random cards.
+ *** Game begins ***
+ For each round, a card is picked from the “top” of each player’s cards.
+ Whoevers card is highest wins that round and keeps both cards.
    + The round winner takes the loser card and place it at the bottom of their deck.
    + The round winner also takes his current drawed card and place it at the bottom of their deck.
+ If the two cards are of the same value, it’s a tie and those cards are discarded.
+ The player who ends up with 0 cards is the loser.
+ Reports who won and how many rounds it took to complete.

## Outside resources
+ I used the CSS Gradient generator:   https://cssgradient.io/
+ I tested the Markdown contents at:   https://dillinger.io/
+ Pulsating CSS obtained from:         https://www.florin-pop.com/blog/2019/03/css-pulse-effect/   as I don't know the code by heart yet.

## Notes for instructor
+ I tried to use associative arrays but spent many hours trying to make them work. It seems some PHP functions, like array_push and array_pop may be clearing the key => value structure of the indices. Not 100% sure though =(
+ Because of the above, at one point I was close to changing the game entirely. However, I simplified the issue by using the regular arrays > var_dump was my friend :)
+ I increased my droplet to 2GB of RAM, which made a tremendous difference. With 1 GB, sometimes it got very slow.
+ Thank you for helping us in the GitHub forums =)