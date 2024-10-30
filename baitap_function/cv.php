<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cv xin viec</title>
    <link rel="stylesheet" href="cv.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>

<style>
    body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 100px;
    text-align: justify;
}

.fab {
    font-size: 30px;
    color: black
}

a:link {
    color: black;
    text-decoration: none;
}

a:hover {
    color: blue;
    text-decoration: underline;
}

.cl1 {
    float: left;
    width: 50%;
}

.cl2 {
    float: right;
    text-align: right;
}

.ri {
    float: right;
    width: 40%;
    text-align: right;
}

.mi {
    text-align: center;
}

.img {
    float: left;
    margin: 1em;
    border-radius: 50%;
    border: 2px solid;
    color: rgb(225, 61, 89);
    margin-bottom: 0%;
}

.main {
    border-bottom: 2px dashed;
    font-size: 40px;
    text-align: center;
    text-transform: capitalize;
}

.ndc {
    float: left;
    width: 20%;
    text-align: left;
    margin-right: 2%;
}

.clear {
    clear: both
}

.explain {
    float: right;
    width: 78%;
}

.nm {
    font-size: 12px;
    text-align: center;
}

span {
    background-color: black;
    color: blanchedalmond;
    border-width: 1px;
}

.td {
    text-transform: capitalize;
    font-style: oblique;
}
</style>

<body>
    <div class="cl1">
        <h1>
            <?php
            echo $_POST["name"];
            ?>
        </h1>
        <p>Senior Network System Administrator
        </p>
    </div>
    <div class="cl2">
        <a href="https://www.instagram.com/" target="_blank">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.facebook.com/" target="_blank">
            <i class='fab fa-facebook'></i>
        </a>
    </div>
    <br clear="all" />
    <div class="ri">
        <div>Email: brett.h@email.co.uk</div>
        <div>
            <a href="https://github.com/spoogen/resume-theme"> Web: www.github.com/spoogen/resume-theme</a>
        </div>
    </div>

    <p class="main">about me</p>
    <img class="img" width="200px" src="https://www.phanmemninja.com/wp-content/uploads/2023/07/anh-dai-dien-zalo-mac-dinh-11.jpg" />
    <p>
        Hi, my name is <?php echo $_POST["name"] ?>.
    </p>
    <p>Sex : <?php echo $_POST["sex"] ?> </p>
    <p>My birthday: <?php echo $_POST["birthday"] ?></p>
    <p>My address: <?php echo $_POST["address"] ?></p>
    <p> <?php echo $_POST["introduce"] ?></p>
    <p>I am most skilled in: <span>AWS </span>and <span>Eating Pizza.</span></p>

    <br clear="all" />
    <p class="main">Projects</p>
    <div class="mi"><b>Super Awesome Projects</b></div>
    <div class="mi"><i>github.com/sptoogen</i></div>
    <div class="mi">.</div>
    <p class="nm"><i>This is probably one of the greatest apps ever created, if you don't agree you're probably
            wrong</i></p>
    <p>I started this project as a way if learning <span>React</span> and it has since grown into a fully fledged app. I
        have learned many skills through this and been I'm very proud of having this in muportforlio. If you don't have
        project as awesome as this I would advise you make one.</p>
    <p class="main">Experience</p>
    <div>
        <div class="ndc">
            <p class="td">The Boring Company</p>
            <p>Senior Network System Administrator</p>
            <p>November 2017 - Present <i>boringcompany.com</i></p>
        </div>
        <div class="explain">
            <p class="nm"><i>Solving 21st century problems by diging holes and making game chaging products like the
                    *not a
                    flamethrower*</i></p>
            <p>Every company needs its networks properly administered and The Boring Company is no exception. Digging
                holes
                is hard and play my part making sure the whole company stays conected. I lead a team of 5 people and
                enjoy
                driving the company to try new technolagies.</p>
            <p> I can work with: <?php 
            $name = $_POST["experience"];
            foreach ($name as $value){
                echo $value . ", ";
            };
                ?></p>
        </div>
        <div class="clear"></div>
        <br />
    </div>
    <br clear="all" />

    <p class="main">Education</p>
    <div class="ndc">
        <p class="td">Harvard University</p>
        </p>BSc Computer Science</p>
        <p>2010-2013</p>
    </div>
    <div class="explain">
        <p class="nm"><i>Established in 1636, Harvard is the oldest higher education institution in the United States,
                and is widely regarded in terms of its influence, reputation, and academic pedigre as a leading
                university in not just the US but also the world.</i></p>
        <p>During my time at Harvard I learnt most of my key skills that have i have taken through my career such as
            teamwork and working to tight deadlines. I thouroughly enjoymy time as university and learnt a lot about a
            healthy work life balance.</p>
        <p>I spent a lot of my free time as a committee member of the <i>Harvard Mountaineering Club</i>taking on roles
            such as <i>Trip Secretary</i> and <i>Vice-President.</i></p>
    </div>

    <br clear="all" />
    <p class="main">a little more about me</p>
    <p>Alongside my interests in networks and software engineering some of my other interests and hobbies are:</p>
    <ul>
        <li>Rock climbing</li>
        <li>Gaming</li>
        <li>Knitting</li>
        <li>
            <a href="https://vi.wikipedia.org/wiki/Ninja" target="_blank">Becoming a ninja</a>
        </li>
    </ul>
    <div>Look at this cool image:</div>
    <img src="https://cdn-images.vtv.vn/2016/1-orid-1481084120348.jpg">

</body>

</html>
<?php
print_r($_POST);
?>