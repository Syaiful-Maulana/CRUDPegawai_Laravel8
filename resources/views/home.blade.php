@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@section('content')
            <!-- page title area start -->
            <div class="page-title-area">
              <div class="row align-items-center">
                  <div class="col-sm-12 mb-3 mt-3">
                      <div class="breadcrumbs-area clearfix">
                          <h4 class="page-title pull-left">Dashboard</h4>
                          <ul class="breadcrumbs pull-right">
                              <li><a href="index.html">Home</a></li>
                              <li><span>Dashboard</span></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <!-- page title area end -->
          <div class="main-content-inner">
              <div class="row">
                  <!-- seo fact area start -->
                  <div class="col-lg-12">
                      <div class="row">
                          <div class="col-md-6 mt-5 mb-3">
                              <div class="card">
                                  <div class="seo-fact sbg1">
                                      <div class="p-4 d-flex justify-content-between align-items-center">
                                          <div class="seofct-icon"><i class="ti-thumb-up"></i> Likes</div>
                                          <h2>2,315</h2>
                                      </div>
                                      <canvas id="seolinechart1" height="50"></canvas>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6 mt-md-5 mb-3">
                              <div class="card">
                                  <div class="seo-fact sbg2">
                                      <div class="p-4 d-flex justify-content-between align-items-center">
                                          <div class="seofct-icon"><i class="ti-share"></i> Share</div>
                                          <h2>3,984</h2>
                                      </div>
                                      <canvas id="seolinechart2" height="50"></canvas>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- seo fact area end -->
                  <!-- Social Campain area start -->
                  <div class="col-lg-12 mt-5">
                      <div class="card">
                          <div class="card-body pb-0">
                              <h4 class="header-title">Social ads Campain</h4>
                              <div id="socialads" style="height: 245px;"></div>
                          </div>
                      </div>
                  </div>
                  <!-- Social Campain area end -->
              </div>
          </div>
@endsection