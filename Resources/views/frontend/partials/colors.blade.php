@php
    $primary = setting("isite::brandPrimary");
    $secondary = setting("isite::brandSecondary");
    $success = setting("isite::brandPositive");
    $info = setting("isite::brandInfo");
    $warning = setting("isite::brandWarning");
    $danger = setting("isite::brandNegative");
    $dark = setting("isite::brandDark");
@endphp
<style>
    :root {
        --primary: {{$primary}};
        --secondary: {{$secondary}};
        --success: {{$success}};
        --info: {{$info}};
        --warning: {{$warning}};
        --danger: {{$danger}};
        --dark: {{$dark}};
    }
</style>