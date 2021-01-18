@extends('layout')

@section('main')
    <h2>Welcome to ZOO RESCUE!</h2>
    <p>Beryl the Terrible has kidnapped 5 animals from the zoo! You have managed
    to sneak into her office at the zoo and have found her computer.</p>

    <p>Can you crack the codes she's left, rescue the animals, and save the zoo?</p>

    <pre role="img" aria-labelledby="art_desc" class="art-mini art-small art-medium" style="width: 230px">
    /------------\
   |  MWA HA HAA! |
    \----.-------/
         |
         |
 /////////////\\\
((((((((((((((\\\\
))) ~~  \ / ~~  (((
((( (o)     (o) )))
)))     <       (((
((( '\______/`  )))
)))\___________/(((
       _) (_
      / \_/ \
</pre>

    <pre role="img" aria-labelledby="art_desc" class="art-large" style="width: 480px">
 /////////////\\\
((((((((((((((\\\\
))) ~~  \ / ~~  (((     /------------\
((( (o)     (o) )))  --|  MWA HA HAA! |
)))     <       (((     \------------/
((( '\______/`  )))
)))\___________/(((
       _) (_
      / \_/ \
</pre>

    <div id="art_desc" aria-hidden="true">A picture of Beryl The Terrible, grinning, and laughing her evil laugh.</div>

    <div class="actions">
        <a class="button" href="/level/1">Start the game</a>
    </div>
@endsection

@section('status')
<div class="status">
    <div class="level">LEVEL: N/A</div>
    <div class="result">STATUS: <span class="info">READY</span></div>
</div>
@endsection
