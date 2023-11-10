<?php
require_once('../../vendor/autoload.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use GGdS\KscinusSDK\Core;

function colorirJson($jsonString) {
    $jsonArray = json_decode($jsonString, true);
    if ($jsonArray === null) {
        return false;
    }

    $jsonFormatted = json_encode($jsonArray, JSON_PRETTY_PRINT);


    
    //$jsonColored = highlight_string("<?php\n" . $jsonFormatted, true);
    $jsonColored = preg_replace(
        '/"([a-z0-9\_\-\s]+)"\:/i',
        '<span class="var">"$1"</span>:',
        $jsonFormatted
    );

    $jsonColored = preg_replace(
        '/\:\s\"([a-z0-9\_\-\s]+)\"/i',
        ':&nbsp;<span class="string">"$1"</span>',
        $jsonColored
    );

    $jsonColored = preg_replace(
        ['/\:\s[0-9]+/', '/(true|false|null|undefined|TRUE|FALSE|UNDEFINED)/'],
        ['<span class="number">$0</span>', '<span class="keyword">$1</span>'],
        $jsonColored
    );

    return $jsonColored;
}
$c = new Core();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kscinus SDK</title>
    <style>[class~=keyword]{color:#2667ca;}[class~=class]{color:#4ec9b0;}.var{color:#9cdcfe;}[class~=method]{color:#dcb862;}pre{width:50%;}pre{background-color:#1f1f1f;}pre{color:#d4d4c9;}[class~=string]{color:#ce834a;}[class~=number]{color:#a7c078;}[class~=result-success]{background-color:#4ec9b0;}pre,[class~=result-success]{padding-left:.104166667in;}[class~=result-success],pre{padding-bottom:.104166667in;}[class~=result-success]{padding-right:.104166667in;}[class~=result-success]{padding-top:.104166667in;}pre{padding-right:0pt;}pre{padding-top:0pc;}</style>
</head>
<!-- 
    $ => &#36;
    / => &#92;
    ; => &semi;
    = => &equals;
 -->
<body>
    <h1>Sample usage</h1>
    <form action="#" method="post">
        <h3>To signin a url:</h3>
<pre><code>
<span class="keyword">use</span>&nbsp;GGdS&#92;KscinusSDK&#92;<span class="class">Core</span>&semi;
<span class="var">&#36;sdk</span>&nbsp;&equals;&nbsp;<span class="keyword">new</span>&nbsp;<span class="class">Core</span>();
<span class="var">$signed</span> = <span class="var">$c</span>-><span class="method">SigninGame</span><span class="keyword">(</span><span class="method">[</span>
    <span class="string">'game'</span>      => <span class="string">'<input type="text" name="game" id="game" placeholder="game-slug">'</span>,
    <span class="string">'type'</span>      => <span class="string">'<input type="number" name="type" id="type" placeholder="game-type">'</span>,
    <span class="string">'email'</span>     => <span class="string">'<input type="text" name="email" id="email" placeholder="Player e-mail">'</span>,
    <span class="string">'balance'</span>   => <span class="string">'<input type="text" name="balance" id="balance" placeholder="Player Balance">'</span>
    <span class="string">'api-key'</span>   => <span class="string">'<input type="text" name="api-key" id="api-key" placeholder="Api Key">'</span>
<span class="method">]</span>, <span class="string">'<input type="text" name="private" id="private" placeholder="Chave privada">'</span><span class="keyword">)</span>;
</code>
</pre>
        <input type="hidden" name="action" value="signit">
        <input type="submit" value="try it">
<?php
if (isset($_POST) && sizeof($_POST) > 0) {
    if ($_POST['action'] == 'signit') {
        $signed = $c->SigninGame([
            'game'  => $_POST['game'],
            'type'  => $_POST['type'],
            'email'  => $_POST['email'],
            'balance' => $_POST['balance'],
            'api-key' => $_POST['api-key']
        ], $_POST['private']);
        echo '<div class="result result-success">Returned a signed URL<code><a href="' . $signed . '" target="_blank">' . $signed . '</a></code></div><br>';
    }
}
?>
    </form>

    <form action="#" method="post">
        <h3>To list the attached games</h3>
        <pre><code>
<span class="keyword">use</span>&nbsp;GGdS&#92;KscinusSDK&#92;<span class="class">Core</span>&semi;
<span class="var">&#36;sdk</span>&nbsp;&equals;&nbsp;<span class="keyword">new</span>&nbsp;<span class="class">Core</span>();
<span class="var">$list</span> = <span class="var">$c</span>-><span class="method">ListGames</span><span class="keyword">(</span><span class="string">'<input type="text" name="api-key" id="api-key" placeholder="Api Key">'</span><span class="string"><span class="keyword">)</span>;
</code>
</pre>
        <input type="hidden" name="action" value="list">
        <input type="submit" value="try it">

        <?php
if (isset($_POST) && sizeof($_POST) > 0) {
    if ($_POST['action'] == 'list') {
        $list = $c->ListGames($_POST['api-key']);

        $jsonString = json_encode($list, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        $jsonColored = colorirJson($jsonString);
        echo '<div class="result result-success">Returned a JSON string with game list<pre><code>' . $jsonColored . '</code></pre></div><br>';
    }
}
?>
    </form>


    <form action="#" method="post">
        <h3>To create player</h3>
        <pre><code>
<span class="keyword">use</span>&nbsp;GGdS&#92;KscinusSDK&#92;<span class="class">Core</span>&semi;
<span class="var">&#36;sdk</span>&nbsp;&equals;&nbsp;<span class="keyword">new</span>&nbsp;<span class="class">Core</span>();
<span class="var">$player</span> = <span class="var">$c</span>-><span class="method">CreatePlayer</span><span class="keyword">(</span><span class="method">[</span>
    <span class="string">'email'</span>     => <span class="string">'<input type="text" name="email" id="email" placeholder="e-mail">'</span>,
    <span class="string">'username'</span>  => <span class="string">'<input type="text" name="username" id="username" placeholder="username">'</span>,
    <span class="string">'balance'</span>   => <span class="string">'<input type="text" name="balance" id="balance" placeholder="Player Balance">'</span>
    <span class="string">'api-key'</span>   => <span class="string">'<input type="text" name="api-key" id="api-key" placeholder="Api Key">'</span>
<span class="method">]</span>, <span class="string">'<input type="text" name="private" id="private" placeholder="Chave privada">'</span><span class="keyword">)</span>;
</code>
</pre>
        <input type="hidden" name="action" value="new-player">
        <input type="submit" value="try it">

        <?php
if (isset($_POST) && sizeof($_POST) > 0) {
    if ($_POST['action'] == 'new-player') {
        $player = $c->CreatePlayer([
            'email'     => $_POST['email'],
            'username'  => $_POST['username'],
            'balance'   => $_POST['balance'],
            'api-key'   => $_POST['api-key']
        ], $_POST['private']);

        echo '<div class="result result-success"><pre><code>' . var_dump($player) . '</code></pre></div><br>';
    }
}
?>
    </form>
</body>

</html>