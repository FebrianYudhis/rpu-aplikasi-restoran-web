<div class="dashboard-wrapper">
    <div class="container-fluid">
        <aside class="page-aside">
            <div class="aside-content">
                <div class="aside-header">
                    <button class="navbar-toggle" data-target=".aside-nav" data-toggle="collapse" type="button"><span class="icon"><i class="fas fa-caret-down"></i></span></button><span class="title">Notifikasi Langsung</span>
                </div>
                <div class="aside-nav collapse">
                    <ul class="nav">
                        <li class="active"><a href="#"><span class="icon"><i class="fas fa-fw fa-inbox"></i></span>Pesanan</a></li>
                        
                    </ul>
                </div>
            </div>
        </aside>
        <div class="main-content container-fluid p-0">
            <div class="email-inbox-header">
                <?= $this->session->flashdata('pesan');?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="email-title"><span class="icon"><i class="fas fa-inbox"></i></span> Pesanan</div>
                    </div>
                </div>
            </div>
            <div class="email-list" id="target">
            </div>
        </div>
    </div>

</div>
