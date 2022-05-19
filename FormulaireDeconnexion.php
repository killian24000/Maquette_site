<?php
function deconnexion()
{
    auth()->logout();

    return redirect('/');   
}
?> 