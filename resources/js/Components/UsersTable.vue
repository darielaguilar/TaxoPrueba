<template>
    <n-space vertical :size="12">
      <n-space>
        <n-button @click="sortName">Sort By Name (Ascend)</n-button>
        <n-button @click="filterAddress">Filter Address (London)</n-button>
        <n-button @click="clearFilters">Clear Filters</n-button>
        <n-button @click="clearSorter">Clear Sorter</n-button>
      </n-space>
      <n-data-table
        ref="dataTableInst"
        :columns="columns"
        :data="props.data"
        :pagination="pagination"
      />
    </n-space>
  </template>
  
  <script>
  import { defineComponent, ref } from 'vue'
  
  const columns = [
    {
      title: 'Name',
      key: 'name'
    },
    {
      title: 'Age',
      key: 'age',
      sorter: (row1, row2) => row1.age - row2.age
    },
    {
      title: 'Chinese Score',
      key: 'chinese',
      defaultSortOrder: false,
      sorter: {
        compare: (a, b) => a.chinese - b.chinese,
        multiple: 3
      }
    },
    {
      title: 'Math Score',
      defaultSortOrder: false,
      key: 'math',
      sorter: {
        compare: (a, b) => a.math - b.math,
        multiple: 2
      }
    },
    {
      title: 'English Score',
      defaultSortOrder: false,
      key: 'english',
      sorter: {
        compare: (a, b) => a.english - b.english,
        multiple: 1
      }
    },
    {
      title: 'Address',
      key: 'address',
      filterOptions: [
        {
          label: 'London',
          value: 'London'
        },
        {
          label: 'New York',
          value: 'New York'
        }
      ],
      filter (value, row) {
        return ~row.address.indexOf(value)
      }
    }
  ]
  
 
  
  export default defineComponent({
    props:['data'],
    setup () {
      const dataTableInstRef = ref(null)
      return {
        data,
        columns,
        dataTableInst: dataTableInstRef,
        pagination: ref({ pageSize: 5 }),
        filterAddress () {
          dataTableInstRef.value.filter({
            address: ['London']
          })
        },
        sortName () {
          dataTableInstRef.value.sort('name', 'ascend')
        },
        clearFilters () {
          dataTableInstRef.value.filter(null)
        },
        clearSorter () {
          dataTableInstRef.value.sort(null)
        }
      }
    }
  })
  </script>