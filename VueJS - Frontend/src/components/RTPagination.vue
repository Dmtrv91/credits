<template>
    <div class="d-flex d-flex justify-content-between">
        <nav>
            <ul class="pagination pagination-sm m-0">
                <li :class="props.theme.prev" @click="props.setPrevPage">
                    <button type="button" class="page-link" v-bind="props.prevProps">
                        <i class="bi bi-arrow-left"></i> Previous
                    </button>
                </li>
            </ul>
        </nav>

        <nav>
            <ul v-show="props.showPagination" class="pagination pagination-sm m-0">
                <li v-for="page in props.pages" :key="page" class="page-item" :class="props.pageClasses(page)"
                    v-on="props.pageEvents(page)">
                    <button type="button" v-bind="props.aProps" :class="props.theme.link">
                        {{ page }}
                    </button>
                </li>
            </ul>
        </nav>

        <nav>
            <ul class="pagination pagination-sm m-0">
                <li :class="props.theme.next" @click="props.setNextPage">
                    <button type="button" v-bind="props.nextProps">
                        Next <i class="bi bi-arrow-right"></i>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
</template>
  
<script>
export default {
    name: "RTPagination",
    props: ["props"],
};
</script>