<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <form @submit.prevent="(edit == false)? AddRole : UpdateRole(roleId)">
                        <div class="form-group">
                          <label for="role">Role</label>
                          <input type="text"
                              class="form-control form-control-md" aria-describedby="helpId" placeholder="Admin, User, Editor" v-model="role">
                          <small id="helpId" class="form-text text-muted">Write the new role.</small>
                        </div>
                       <div class="form-group">
                         <label for="authLevel">Authority Level</label>
                         <input type="number"
                             class="form-control form-control-md" aria-describedby="helpId" placeholder="1 for highest or 10 for lowest" v-model="authLevel">
                         <small id="helpId" class="form-text text-muted">If unsure, leave it blank</small>
                       </div>
                        <div class="form-group float-right">
                            <Button type="submit" class="btn btn-warning rounded btn-md" :disabled="(!role && !authLevel)">
                                Submit
                            </Button>
                            <Button type="reset" class="btn btn-danger rounded btn-md">
                                Reset
                            </Button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
</template>

<script>
export default{
    props:{
        'onlyrole' : Object,
    },
    data(){
        return{
            role: '',
            authLevel:'',
            success:null,
            error:null,
            edit:false,
            oneRole:null,
            roleId:null,
        }
    },
    created(){
        if(this.onlyrole)
        {
            this.setRole(this.onlyrole);
        }
    },
    methods:{
        AddRole()
        {
            axios.post('/add-role', {
                role: this.role,
                authLevel: this.authLevel
            })
            .then(res => {
                alert('Data added successfully')
                this.role = null
                this.authLevel = null
            })
            .catch(err => alert(err))
        },
        setRole(roleInfo)
        {
            this.role = roleInfo.role,
            this.authLevel = roleInfo.authLevel
            this.edit = true
            this.roleId = roleInfo.id
        },
        UpdateRole(roleId)
        {
            axios({
                method:'PUT',
                url:`/role/${roleId}`,
                data: ({
                    role: this.role,
                    authLevel: this.authLevel
                })
            })
            .then(res => alert('Data has been updated'))
            .catch(err => alert(err));
        }
    }
}

</script>
