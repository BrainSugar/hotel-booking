<?php

namespace Brainsugar\Http\Controllers\Dashboard;

use Brainsugar\Http\Controllers\Controller;

class DashboardResourceController extends Controller
{
  public function load()
  {
    if( $this->request->get( '_redirect' ) ) {
      $this->redirect( $this->request->get( '_redirect' ) );
      exit;
    }
  }

  // GET
  public function index() {
    return Brainsugar()->view( 'dashboard.optionsresview' )->with( 'method', 'GET' );
  }

  // POST
  public function store() {
    return Brainsugar()->view( 'dashboard.optionsresview' )->with( 'method', 'POST' );
  }

  // PUT AND PATCH
  public function update() {
    return Brainsugar()->view( 'dashboard.optionsresview' )->with( 'method', 'PUT AND PATCH' );
  }

  // DELETE
  public function destroy() {
    return Brainsugar()->view( 'dashboard.optionsresview' )->with( 'method', 'DELETE' );
  }

}