<template>
    <table class="table table-bordered table-stripped table-hovered">
        <thead>
            <tr>
                <td v-for="(thead, index) in theads" :key="index">{{thead.title}}</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(tbody, index) in tbodies" :key="index">
                <td>{{index+1}}</td>
                <td>{{tbody.role}}</td>
                <td>
                    <span v-if="(tbody.authLevel < 4)" class="badge badge-pill badge-info">Highest tier</span>
                    <span v-if="((tbody.authLevel >= 4) && (tbody.authLevel <= 6))" class="badge badge-pill badge-secondary">Mid tier</span>
                    <span v-if="(tbody.authLevel >6)" class="badge badge-pill badge-light">Low tier</span>
                </td>
                <td>{{moment().format('MMMM Do YYYY, h:mm:ss a', tbody.updatedAt)}}</td>
                <td>
                    <a :herf="tbody.id" :href="'/admin/role/'+tbody.id" class="btn btn-md rounded btn-success mr-2"><i class="fas fa-edit pr-2 mr-2"></i>Edit</a>
                    <a @click="deleteRole(tbody.id)" class="btn btn-md rounded btn-danger mr-2"><i class="fas fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import moment from 'moment'
export default {
    data(){ 
        return{
            moment,
            theads:[
                {title:'#'},
                {title:'Roles'},
                {title:'Authority Level'},
                {title:'Updated At'},
                {title:'Action'}
            ],
            tbodies:[],
            actions:[
                {link:'/admin/role', class:'btn btn-md rounded btn-success mr-2', iconClass:'fas fa-edit pr-2', title:'Edit'},
                {link:'/admin/role', class:'btn btn-sm rounded btn-danger', iconClass:'fas fa-trash', title:'Delete'}
            ],
        }
    },
    created(){
        axios.get('/roles')
            .then(res => this.tbodies = res.data.data)
            .catch(err => alert(err));
    },
    methods:{
        deleteRole(roleId)
        {
            if(confirm('Are you sure you want to delete this?'))
            {
                axios.delete(`/delete-role/${roleId}`)
                .then(res => alert('Role has been deleted!'))
                .catch(err => alert(err));
            }
        },
    }
}
</script>

<style lang="scss" scoped>

</style>

