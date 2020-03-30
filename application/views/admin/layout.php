<!DOCTYPE html>
<html lang="en">
<!-- HEAD-->
<?=$head?>
<body>
    <?php if($menu == 'Chat'):?>
    <div id="container" class="effect aside-float aside-bright mainnav-lg page-fixedbar">
    <?php else:?>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php endif;?>
        
        <!--NAVBAR-->
        <?=$header?>
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <div id="content-container">
                <?=$content?>
            </div>
            <!--END CONTENT CONTAINER-->

            <!--MAIN NAVIGATION-->
            <?=$sidebar?>
            <!--END MAIN NAVIGATION-->

        </div>

        <!-- FOOTER -->
        <footer id="footer">

            <div class="hide-fixed pull-right pad-rgt">
                14GB of <strong>512GB</strong> Free.
            </div>
            <p class="pad-lft">&#0169; 2018 Your Company</p>

        </footer>
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
    </div>
    <!-- END OF CONTAINER -->

    <?=$script?>

</body>

</html>
