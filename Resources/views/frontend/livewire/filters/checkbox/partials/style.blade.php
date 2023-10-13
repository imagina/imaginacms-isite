<style>
    .filter-checkbox .tagBoxs {
        position: relative;
        z-index: 1;
        display: inline-block;
        min-height: 1.5rem;
        padding-left: 0;
        margin-right: 10px;
    }
    .filter-checkbox .tagBoxs input[type="checkbox"] {
        position: absolute;
        left: 0;
        z-index: -1;
        width: 100%;
        height: 100%;
        opacity: 0;
        background-color: initial;
        cursor: default;
        appearance: checkbox;
    }
    .filter-checkbox .tagBoxs label {
        padding: 0.3rem 1rem;
        text-align: center;
        position: relative;
        margin-bottom: 0;
        vertical-align: top;
        display: inline-block;
        cursor: pointer;
    }
    .filter-checkbox .tagBoxs span {
        color: #333;
        position: relative;
        z-index: 9;
        font-size: 0.9rem;
    }
    .filter-checkbox .tagBoxs label::before {
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        height: 100%;
        border: 1px solid #E5E5E5;
        pointer-events: none;
        content: "";
        background-color: #ffffff;
        position: absolute;
        border-radius: 4px;
    }
    .filter-checkbox .tagBoxs label::after {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        height: 100%;
        content: "";
        background: none;
    }
    .filter-checkbox .tagBoxs input[type="checkbox"]:checked ~ label span {
        color: #ffffff;
    }
    .filter-checkbox .tagBoxs input[type="checkbox"]:not(:disabled):active ~ label::before {
        background-color: var(--primary);
        border-color: var(--primary);
    }
    .filter-checkbox .tagBoxs input[type="checkbox"]:checked ~ label::before {
        background-color: var(--primary);
        border-color: var(--primary);
    }

</style>
