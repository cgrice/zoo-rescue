@extends('layout')

@section('main')
<h2>Well done!</h2>

<p>You caught Beryl! This zoo is now safe forever, and the animals are happy!</p>

<pre role="img" aria-labelledby="art_desc" class="art-mini art-small art-medium" style="width: 230px">
    /-----------\
   |  NOOOOOOOO! |
    \----.------/
         |
         |
 /////////////\\\
((((((((((((((\\\\
))) ~~      ~~  (((
((( (o)     (o) )))
))) '    <   '  (((
((( '  ~~~~~~   )))
)))\___________/(((
       _) (_
      / \_/ \
</pre>

<pre role="img" aria-labelledby="art_desc" class="art-large" style="width: 480px">
 /////////////\\\
((((((((((((((\\\\
))) ~~      ~~  (((     /----------\
((( (o)     (o) )))  --|  NOOOOOOO! |
))) '    <   '  (((     \----------/
((( '  ~~~~~~   )))
)))\___________/(((
       _) (_
      / \_/ \
</pre>
<div id="art_desc" aria-hidden="true">A picture of Beryl The Terrible. She's crying, and saying noooo!</div>

<hr/>

<h2>The End</h2>

<center>
<p><u>Credits</u>
<br/>Writing and Direction: Emily
<br/>Coding and Design: Chris</p>
</center>

<div class="actions">
        <a class="button" href="/">Play again?</a>
    </div>
@endsection

@section('status')
<div class="status">
    <div class="level">LEVEL: N/A</div>
    <div class="result">STATUS: <span class="success">WINNER</span></div>
</div>
@endsection
