<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="{{ asset('asset/logo-metamorjiwa.png') }}" 
                    alt="" 
                    style="height: 40px;">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2" style="color:#b57aa1;">Metamorjiwa</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{request()->is('Admin') ? 'active' : ''}}">
              <a href="{{route('Admin')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle" style="color:#ff5b95;"></i>
                <div data-i18n="Analytics" style="color:#b57aa1;">Dashboard</div>
              </a>
            </li>

            <!-- users -->
             <li class="menu-item {{request()->is('users') || request()->is('users/*') ? 'active' : ''}}">
              <a href="{{route('users.index')}}" class="menu-link">
                <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
                  <i class="menu-icon tf-icons bx bx-user me-2" style="color:#ff5b95;"></i>
                <div data-i18n="Analytics" style="color:#b57aa1;">Users</div>
              </a>
            </li>

            {{-- pages --}}

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text" style="color:#b57aa1;">Pages</span>
            </li>
            <!-- Portofolios -->
             <li class="menu-item {{request()->is('hero') || request()->is('hero/*') ? 'active' : ''}}">
              <a href="{{route('hero.edit')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown" style="color:#ff5b95;"></i>
                <div data-i18n="Analytics" style="color:#b57aa1;">Hero</div>
              </a>
            </li>
            <!-- Tentang -->
             <li class="menu-item {{request()->is('tentang') || request()->is('tentang/*') ? 'active' : ''}}">
              <a href="{{route('tentang.edit')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-info-circle" style="color:#ff5b95;"></i>
                <div data-i18n="Analytics" style="color:#b57aa1;">Tentang</div>
              </a>
            </li>
            <!-- Portofolios -->
             <li class="menu-item {{request()->is('preview') || request()->is('preview/*') ? 'active' : ''}}">
              <a href="{{route('preview.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top" style="color:#ff5b95;"></i>
                <div data-i18n="Analytics" style="color:#b57aa1;">Preview</div>
              </a>
            </li>
            <!-- Portofolios -->
             <li class="menu-item {{request()->is('contact') || request()->is('contact/*') ? 'active' : ''}}">
              <a href="{{route('contact.edit')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group" style="color:#ff5b95;"></i>
                <div data-i18n="Analytics" style="color:#b57aa1;">Contact</div>
              </a>
            </li>
            <!-- Testimoni -->
             <li class="menu-item {{request()->is('testimoni') || request()->is('testimoni/*') ? 'active' : ''}}">
              <a href="{{route('testimoni.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-star" style="color:#ff5b95;"></i>
                <div data-i18n="Analytics" style="color:#b57aa1;">Testimoni</div>
              </a>
            </li>
            <!-- Message-->
             <li class="menu-item {{request()->is('message') || request()->is('message/*') ? 'active' : ''}}">
               <a href="{{route('message.index')}}" class="menu-link">
                 <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
                <i class="menu-icon tf-icons bx bx-detail" style="color:#ff5b95;"></i>
                <div data-i18n="Analytics" style="color:#b57aa1;">Message
                  @if (($count ?? 0) > 0)
                    <span class="badge bg-label-danger rounded-pill ms-2">{{ $count }}</span>
                    @endif  
                </div>
              </a>
            </li>
            <!-- Sosial Media -->
            <li class="menu-item {{request()->is('sosialmedia') || request()->is('sosialmedia/*') ? 'active' : ''}}">
              <a href="{{route('sosialmedia.edit')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-share-alt" style="color:#ff5b95;"></i>
                <div data-i18n="Analytics" style="color:#b57aa1;">Sosial Media</div>
              </a>
            </li>
            <!-- Layouts -->
            
          </ul>
        </aside>