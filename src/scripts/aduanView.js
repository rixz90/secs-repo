export default () => ({
	staff: false,
	student: false,
	showForm: false,
	val: 'Select user type...',

	toggleStudent() {
		this.staff = false
		this.student = true
		this.showForm = true
		this.val = 'Student'
		this.$refs.dropdown.open = false
	},
	toggleStaff() {
		this.staff = true
		this.student = false
		this.showForm = true
		this.val = 'Staff'
		this.$refs.dropdown.open = false
	},
})
