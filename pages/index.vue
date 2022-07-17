<template>
  <div class="grid grid-flow-col h-screen w-full grid-cols-12 select-none">
    <div class="bg-primary-background col-span-2">
      <div class="flex flex-col justify-start h-full bg-opacity-20">
        <div
          class="h-14 bg-secondary-color bg-opacity-60 flex flex-col justify-center py-7 m-1 rounded-md"
        >
          <div class="flex justify-center text-white">
            <img class="max-h-10" src="~/static/app_icon.png" alt="" />
            <h1 class="my-auto font-semibold uppercase">Atresna POS</h1>
          </div>
        </div>
        <div class="h-full bg-white m-1 rounded-md flex flex-col justify-start">
          <div class="my-5">
            <div class="mx-1 px-3">
              <div
                class="bg-primary-color bg-opacity-80 rounded-md my-2 py-2 text-white px-2"
              >
                <i class="fas fa-home text-sm"></i>
                <span class="my-3 text-sm">Dashboard</span>
              </div>

              <div>
                <div
                  class="bg-secondary-color bg-opacity-80 rounded-md my-2 py-1 text-white px-2 flex justify-between"
                >
                  <div>
                    <i class="my-1 fas fa-box"></i>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Menu Data</span
                    >
                  </div>

                  <button @click="sidebarControllerMenuMaster('barang')">
                    <i class="fas fa-arrow-down"></i>
                  </button>
                </div>
                <div v-if="childOpenMaster">
                  <div
                    class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                  >
                    <button>
                      <i class="fas fa-plus"></i>
                    </button>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Data</span
                    >
                  </div>
                  <div
                    class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                  >
                    <button>
                      <i class="fas fa-plus"></i>
                    </button>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Data</span
                    >
                  </div>
                  <div
                    class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                  >
                    <button>
                      <i class="fas fa-plus"></i>
                    </button>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Data</span
                    >
                  </div>
                  <div
                    class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                  >
                    <button>
                      <i class="fas fa-plus"></i>
                    </button>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Data</span
                    >
                  </div>
                </div>
              </div>
              <div>
                <div
                  class="bg-secondary-color bg-opacity-80 rounded-md my-2 py-1 text-white px-2 flex justify-between"
                >
                  <div>
                    <i class="fas fa-file"></i>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Transaksi Menu Data</span
                    >
                  </div>
                  <button @click="sidebarControllerMenuMaster('transaksi')">
                    <i class="fas fa-arrow-down"></i>
                  </button>
                </div>
                <div v-if="childOpenTransaksi">
                  <div
                    class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                  >
                    <button>
                      <i class="fas fa-plus"></i>
                    </button>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Data</span
                    >
                  </div>
                  <div
                    class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                  >
                    <button>
                      <i class="fas fa-plus"></i>
                    </button>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Data</span
                    >
                  </div>
                  <div
                    class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                  >
                    <button>
                      <i class="fas fa-plus"></i>
                    </button>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Data</span
                    >
                  </div>
                  <div
                    class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                  >
                    <button>
                      <i class="fas fa-plus"></i>
                    </button>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Data</span
                    >
                  </div>
                </div>
              </div>
              <div>
                <div
                  class="bg-secondary-color bg-opacity-80 rounded-md my-2 py-1 text-white px-2 flex justify-between"
                >
                  <div>
                    <i class="fas my-1 fa-chart-pie"></i>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Laporan Menu Data</span
                    >
                  </div>
                  <button @click="sidebarControllerMenuMaster('laporan')">
                    <i class="fa fa-arrow-down"></i>
                  </button>
                </div>
                <div v-if="childOpenReport">
                  <div
                    class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                  >
                    <button>
                      <i class="fas fa-plus"></i>
                    </button>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Data</span
                    >
                  </div>
                  <div
                    class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                  >
                    <button>
                      <i class="fas fa-plus"></i>
                    </button>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Data</span
                    >
                  </div>
                  <div
                    class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                  >
                    <button>
                      <i class="fas fa-plus"></i>
                    </button>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Data</span
                    >
                  </div>
                  <div
                    class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                  >
                    <button>
                      <i class="fas fa-plus"></i>
                    </button>
                    <span class="uppercase font-semibold my-1 text-xs"
                      >Master Data</span
                    >
                  </div>
                </div>
              </div>

              <div
                class="bg-primary-color bg-opacity-80 rounded-md my-2 py-2 text-white px-2 flex justify-between"
              >
                <div>
                  <i class="fas fa-cogs text-sm"></i>
                  <span class="my-3 text-sm">Settings</span>
                </div>
                <button @click="sidebarControllerMenuMaster('utility')">
                  <i class="fas fa-arrow-down"></i>
                </button>
              </div>
              <div v-if="childUtility">
                <div
                  class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                >
                  <button>
                    <i class="fas fa-users"></i>
                  </button>
                  <span class="uppercase font-semibold my-1 text-xs"
                    >Pengaturan User</span
                  >
                </div>
                <div
                  class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                >
                  <button>
                    <i class="fas fa-building"></i>
                  </button>
                  <span class="uppercase font-semibold my-1 text-xs"
                    >Pengaturan Perusahaan</span
                  >
                </div>
                <div
                  class="rounded-md my-2 py-1 text-text-secondary px-2 flex justify-start gap-2 font-semibold bg-primary-background"
                >
                  <button>
                    <i class="fas fa-cog"></i>
                  </button>
                  <span class="uppercase font-semibold my-1 text-xs"
                    >Pengaturan Software</span
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="h-28 bg-white rounded-md m-1 mx-1 px-2 py-3">
          <div class="bg-primary-background m-1 rounded-md h-full">
            <div class="flex flex-col justify-center text-center h-full py-2">
              <div class="mx-2 leading-3">
                <i class="fas fa-bug text-red-500"></i>
                <span class="text-text-primary text-xs"
                  >Menemukan Kesalahan/Bug Program ?
                </span>
              </div>
              <div class="text-xs text-primary-color">
                <a href="mailto:atresnacreative@gmail.com">
                  <i class="fas fa-envelope"></i> Kirimkan Email Ke Kami Dengan
                  Screenshoot Error Program
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-primary-background col-span-10">
      <div class="flex flex-col justify-start h-full">
        <div class="h-16 bg-white mt-2 mx-2 rounded-md">
          <div class="mx-3 flex flex-col justify-center h-full">
            <div class="flex justify-between my-auto">
              <div>
                <input
                  class="w-72 text-sm border-2 border-primary-color py-1 focus:border-primary-color focus-within:border-primary-color focus:outline-none rounded-md outline-none my-auto px-2"
                  type="search"
                  name=""
                  id=""
                  placeholder="Search"
                />
                <button
                  class="bg-primary-color px-6 py-1 rounded-md text-white"
                >
                  Cari
                </button>
              </div>
              <div class="flex justify-end gap-2 py-1">
                <span class="text-text-primary font-semibold"
                  >Saldi Sucipto</span
                >
                <button class="text-primary-color">
                  <i class="fas fa-arrow-alt-circle-down py-1"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="h-full bg-white rounded-md m-2">
          <div class="m-3 grid grid-flow-row grid-cols-4 gap-2">
            <div class="bg-primary-color bg-opacity-80 h-28 rounded-md">
              <div class="m-3">
                <i class="fas text-white fa-2x fa-chart-pie"></i>
              </div>
            </div>
            <div class="bg-primary-color bg-opacity-80 h-28 rounded-md">
              <div class="m-3">
                <i class="fas text-white fa-2x fa-chart-pie"></i>
              </div>
            </div>
            <div class="bg-primary-color bg-opacity-80 h-28 rounded-md">
              <div class="m-3">
                <i class="fas text-white fa-2x fa-chart-pie"></i>
              </div>
            </div>
            <div class="bg-primary-color bg-opacity-80 h-28 rounded-md">
              <div class="m-3">
                <i class="fas text-white fa-2x fa-chart-pie"></i>
              </div>
            </div>
          </div>
          <div class="m-3 grid grid-flow-row grid-cols-2 gap-2">
            <div class="bg-secondary-color bg-opacity-80 h-60 rounded-md">
              <div class="m-3">
                <i class="fas text-white fa-2x fa-chart-pie"></i>
              </div>
            </div>
            <div class="bg-secondary-color bg-opacity-80 h-60 rounded-md">
              <div class="m-3">
                <i class="fas text-white fa-2x fa-chart-pie"></i>
              </div>
            </div>
            <div class="bg-secondary-color bg-opacity-80 h-60 rounded-md">
              <div class="m-3">
                <i class="fas text-white fa-2x fa-chart-pie"></i>
              </div>
            </div>
            <div class="bg-secondary-color bg-opacity-80 h-60 rounded-md">
              <div class="m-3">
                <i class="fas text-white fa-2x fa-chart-pie"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="h-12 bg-white rounded-md mx-2 mb-2">tes</div> -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'IndexPage',
  data() {
    return {
      childOpenMaster: false,
      childOpenTransaksi: false,
      childOpenReport: false,
      childUtility: false,
    }
  },
  methods: {
    sidebarControllerMenuMaster(menuController) {
      if (menuController == 'barang') {
        this.childOpenMaster = !this.childOpenMaster
      } else if (menuController == 'transaksi') {
        this.childOpenTransaksi = !this.childOpenTransaksi
      } else if (menuController == 'laporan') {
        this.childOpenReport = !this.childOpenReport
      } else if (menuController == 'utility') {
        this.childUtility = !this.childUtility
      }
    },
  },
}
</script>
