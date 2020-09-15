<template>
<div>
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        Dropdown <span class="caret"></span>
    </a>
        <ul class="dropdown-menu">
            <div href="" @click="MarkAsRead(notification)">
                <h5>{{ notification.data.by }}</h5>
                booked for
                <h6>{{ notification.data.route }}</h6> 
                on
                <small>{{ notification.data.date }}</small>
            </div>
            <hr>
        </ul>
</div>
</template>

<script>
    export default {
        props:['notifications'],
    }
</script>
