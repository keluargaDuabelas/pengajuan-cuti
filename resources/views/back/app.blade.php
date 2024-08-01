<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    @include('back.style')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">


        <!-- Menu -->

        @include('back.side')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @yield('content')

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with  by
                  <a href="" target="_blank" class="footer-link fw-medium">Phamtomproject</a>
                </div>
                <div class="d-none d-lg-inline-block">
                  <a href="" class="footer-link me-4" target="_blank">License</a>
                  <a href="" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href=""
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href=""
                    target="_blank"
                    class="footer-link"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    @include('back.script')
  </body>
</html>
