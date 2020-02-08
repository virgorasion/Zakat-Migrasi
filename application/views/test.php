<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Legacy User Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Legacy User Menu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Tabs Custom Content Examples
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <h4>Custom Content Below</h4>
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                            href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                            aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                            href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile"
                            aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill"
                            href="#custom-content-below-messages" role="tab"
                            aria-controls="custom-content-below-messages" aria-selected="false">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill"
                            href="#custom-content-below-settings" role="tab"
                            aria-controls="custom-content-below-settings" aria-selected="false">Settings</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus
                        ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna
                        feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula.
                        Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque
                        habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin
                        id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim
                        sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor
                        porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non
                        consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus.
                        Cras lacinia erat eget sapien porta consectetur.
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                        aria-labelledby="custom-content-below-profile-tab">
                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus
                        ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula
                        placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet
                        ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel"
                        aria-labelledby="custom-content-below-messages-tab">
                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus
                        volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce
                        nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue
                        ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur
                        eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur,
                        ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex
                        vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus.
                        Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel"
                        aria-labelledby="custom-content-below-settings-tab">
                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus
                        turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis
                        vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum
                        pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget
                        aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac
                        habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div>
                </div>
                <div class="tab-custom-content">
                    <p class="lead mb-0">Custom Content goes here</p>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/controlside');
$this->load->view('template/js');
?>