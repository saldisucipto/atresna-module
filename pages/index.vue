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
                class="bg-primary-color bg-opacity-80 rounded-md my-2 py-2 text-white px-1"
              >
                <i class="fas fa-home text-sm"></i>
                <span class="my-3 text-sm">Dashboard</span>
              </div>

              <div
                class="bg-secondary-color bg-opacity-80 rounded-md my-2 py-1 text-white px-2 flex justify-between"
              >
                <span class="uppercase my-1 text-xs">Master Data</span>
                <button>
                  <i class="fas fa-arrow-down"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="h-28">tes</div>
      </div>
    </div>
    <div class="bg-primary-background col-span-10">
      <div class="flex flex-col justify-start h-full">
        <div class="h-14">tes</div>
        <div class="h-full">tes</div>
        <div class="h-12">tes</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'IndexPage',
}
</script>
