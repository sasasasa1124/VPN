    listenForNewGroups() {
        Echo.private('users.' + this.user.id)
            .listen('GroupCreated', (e) => {
                this.groups.push(e.group);
            });
    }