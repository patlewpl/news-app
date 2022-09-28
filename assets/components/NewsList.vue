<template>
  <main>
    <h1 class="page__title">News Review ({{ newsList.length }})</h1>
    <p v-if="isListEmpty">Empty list.</p>
    <section v-else class="news">
      <ul class="news__list">
        <li
          v-if="!isLoading"
          v-for="news in displayedNews"
          :key="news.id"
          class="news__item"
        >
          <div class="news__header">
            <h2 class="news__title">{{ news.title }}</h2>
            <p class="news__date">{{ news.releaseDate }}</p>
          </div>
          <img
            :src="news.imageUrl"
            :alt="news.title"
            @click="enableGallery(news.imageUrl, news.title)"
            class="news__image"
          />
        </li>
      </ul>
      <ul class="pagination">
        <li v-for="pageNumber in pages" @click="page = pageNumber">
          <button type="button" class="pagination__item">
            {{ pageNumber }}
          </button>
        </li>
      </ul>
    </section>
    <base-spinner v-if="isLoading"></base-spinner>
    <teleport to="body">
      <section
        v-if="isGalleryEnabled"
        @wheel.prevent
        @touchmove.prevent
        @scroll.prevent
        @click="isGalleryEnabled = false"
        class="gallery"
      >
        <span @click="isGalleryEnabled = false" class="gallery__close">x</span>
        <img
          :src="choosenImageUrl"
          :alt="choosenImageAlt"
          class="gallery__image"
        />
      </section>
    </teleport>
  </main>
</template>

<script>
import { ref, computed, watch, onMounted } from "vue";

export default {
  setup() {
    const newsList = ref([]);
    const page = ref(1);
    const perPage = ref(6);
    const pages = ref([]);

    const isLoading = ref(false);

    const isGalleryEnabled = ref(false);
    const choosenImageUrl = ref("");
    const choosenImageAlt = ref("");

    const isListEmpty = computed(() => {
      return newsList.length === 0 ? true : false;
    });
    const displayedNews = computed(() => {
      return paginate(newsList.value);
    });

    async function fetchAllNews() {
      isLoading.value = true;
      const response = await fetch("http://127.0.0.1:8000/api/news");
      const responseData = await response.json();

      if (!response.ok) {
        try {
          throw new Error("Whoops! Try again.");
        } catch (e) {
          console.error(`${e.name}: ${e.message}`);
        }
      }

      newsList.value = responseData;
      isLoading.value = false;
    }

    function setPages() {
      let numberOfPages = Math.ceil(newsList.value.length / perPage.value);
      for (let index = 1; index <= numberOfPages; index++) {
        pages.value.push(index);
      }
    }

    function paginate(news) {
      const paginatePage = page.value;
      const paginateNewsPerPage = perPage.value;
      const from = paginatePage * paginateNewsPerPage - paginateNewsPerPage;
      const to = paginatePage * paginateNewsPerPage;
      return news.slice(from, to);
    }

    function enableGallery(src, alt) {
      isGalleryEnabled.value = true;
      choosenImageUrl.value = src;
      choosenImageAlt.value = alt;
    }

    watch(newsList, () => {
      setPages();
    });

    onMounted(() => {
      fetchAllNews();
    });

    return {
      isListEmpty,
      displayedNews,
      newsList,
      pages,
      page,
      enableGallery,
      isGalleryEnabled,
      choosenImageUrl,
      choosenImageAlt,
      isLoading,
    };
  },
};
</script>

<style lang="scss" scoped>
@import "../styles/newsList.scss";
</style>
