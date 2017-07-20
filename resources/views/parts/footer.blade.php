<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copy">
                    <h6>Games x <span class="color">Mod</span></h6>
                    <p>Copyright &copy; <a href="#">GamexMod Site</a>
                        - <a href="http://www.dmca.com/Protection/Status.aspx?ID=ee1394ca-64c9-45df-9f93-cf61339f0ace"
                             title="DMCA.com Protection Status" class="dmca-badge">
                            <img src="//images.dmca.com/Badges/dmca_protected_sml_120l.png?ID=ee1394ca-64c9-45df-9f93-cf61339f0ace"
                                 alt="DMCA.com Protection Status"/>
                        </a>
                    </p>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/html5shiv.js')}}"></script>
<script src="{{asset('js/site.js')}}"></script>
<script src="{{asset('js/masonry.min.js')}}"></script>
<script>
    $( document ).ready(function() {
        var newGame = $('#new-games');
        newGame.masonry({
            itemSelector: '.new-game'
        });
        $('[data-toggle="popover"]').popover();
    });

</script>