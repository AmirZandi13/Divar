<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Divar</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">

    <link href="/css/select2.min.css" rel="stylesheet">

</head>

<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">This project is for Hamed Rajabi</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="/user/advertise" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                <strong>Send Advertise</strong>
            </a>

                <select onchange='window.location="/divar/"+this.options[this.selectedIndex].value+"/all"' style="width: 300px" name="sss" id="countries">
                    @foreach($locations as $location)
                        <option @if($city == $location->name)
                                selected
                                @endif
                                class="qq"  value={{$location->name}}>{{$location->name}}</option>
                    @endforeach

                </select>


            @if(auth()->user())

                <a href="/logout">
                    <strong>Logout</strong>
                </a>

            @else
                <a href="/register">
                    <strong>register</strong>
                </a>
                <a href="/login">
                    <strong>login</strong>
                </a>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

    </div>
</header>

<main role="main">

    <section style="height: 450px;"  class="jumbotron text-center">
        <div class="" style="float: right;width: 60%">
            <form class="form-horizontal col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <div class="col-sm-10 col-12">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Search in advertises">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-12">
                        <select style="width: 540px" name="" id="select">
                            <option value="">all advertises</option>
                            <option value="">b</option>
                            <option value="">c</option>
                            <option value="">d</option>

                        </select>
                    </div>
                </div>

                <div class="form-group col-12">
                    <div class="col-sm-10 ">
                        <select style="width: 540px" name="" id="select2" multiple>
                            <option selected value="">all locations</option>
                            <option value="">b</option>
                            <option value="">c</option>
                            <option value="">d</option>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
        <div style="float: left;width: 20%">
            <ul>
                @foreach($categories as $category)
                   <?php
                        echo renderNode($category)
                    ?>
                @endforeach

            </ul>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">

               @foreach($advertises as $advertise)

                        <div class="col-md-4">
                            <div style="height: 550px"  class="card mb-4 box-shadow">
                                <a href="/advertise/{{$advertise->id}}">
                                <img height="200px" class="card-img-top" src="{{$advertise->image['thumb']}}" alt="Card image cap">
                                </a>
                                <div class="card-body">
                                    <h1>{{$advertise->title}}</h1>
                                    <p class="card-text">{{$advertise->description}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">{{\Carbon\Carbon::now()}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                   @endforeach

            </div>
        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">

        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/jquery.js"></script>
<script src="/js/jquery.slim.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/js/jquery-slim.min.js"><\/script>')</script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/holder.min.js"></script>
<script src="/js/select2.js"></script>
<script>
    //    $('#select2').select2(
    //        tags = true
    //    );
    $('#select').select2({

    });

    $('#select2').select2({
        tags : true
    });

    $('#countries').select2({

    });
</script>

<script>
    $('.qq').on('click' , function () {
        $(this).attr('selected' , 'selected');
    })
</script>

</body>
</html>