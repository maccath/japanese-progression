<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ app.title }}</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>{{ app.title }}</h1>

        <p>
            Studying towards 日本語能力試験 N2 level, Using <a href="http://forum.koohii.com/viewtopic.php?id=5322">Nukemarine's guide</a> and the <a href="http://www.3anet.co.jp/ja/1253/">新完全マスター文法 N２</a> grammar book to track progress.
        </p>
    </div>

    <section id="progress">
        <h2>Current Progress</h2>
        {% for level in levels %}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    {{ level.name }}
                    {% if level.deadline %}
                    <span class="label label-default status">Deadline: {{ level.deadline }}</span>
                    {% endif %}
                </h3>
            </div>
            <div class="panel-body">
                {% if level.description %}
                <div class="bs-callout">
                    <p>{{ level.description }}</p>
                </div>
                {% endif %}

                {% for stage in level.stages %}
                {% if stage.part and stage.part != oldpart %}
                {% set oldpart = stage.part %}
                <h4>{{ stage.part }}</h4>
                {% endif %}
                <div class="row">
                    <div class="col-md-3">
                        <span {% if stage.description %}class="tooltip-hover" data-toggle="tooltip" data-placement="bottom" title="{{ stage.description }}"{% endif %}>
                        {% if stage.link %}<a href="{{ stage.link }}">{% endif %}
                                {{ stage.name }}
                                {% if stage.link %}</a>{% endif %}
                        </span>
                    </div>
                    <div class="col-md-9">
                        <div class="progress">
                            <div class="progress-bar progress-bar-{{ progressColour(percentage(stage.complete, stage.items)) }} {% if stage.complete > 0 and stage.complete < stage.items %}progress-bar-striped active{% endif%}" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width: {{ percentage(stage.complete, stage.items) }}%">
                                <span>{{ stage.complete }} / {{ stage.items }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                {% endfor %}
            </div>
        </div>
        {% endfor %}
    </section>
</div>
<!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>