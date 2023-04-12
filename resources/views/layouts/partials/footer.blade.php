<footer class="page-footer">
    <div class="newsletter">
        <h1>Subscribe to our emails</h1>
        <p>Subscribe to our mailing list for insider news, product launches, and more.</p>
        <div class="newsletter-field">
            <input type="email" id="email" name="email" class="@error('email') has-error @enderror" placeholder="Email" value="">
            @error('email')
                <span class="field-error">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="footer2">
        <div class="copyright">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 64 64"><g fill="#fff"><path d="M32 2C18.2 2 7 13.2 7 27s11.2 25 25 25s25-11.2 25-25S45.8 2 32 2m0 45c-11 0-20-9-20-20S21 7 32 7s20 9 20 20s-9 20-20 20"/><path d="M25.4 19.3c.9-1 2-1.8 3.3-2.3c1.3-.6 2.6-.9 4-.9c1.7 0 3.4.4 4.8 1.3c1.4.8 2.7 2 3.6 3.3l3.6-2.7c-1.4-1.8-3.1-3.4-5.1-4.4c-2.1-1.1-4.3-1.6-6.8-1.6c-2 0-4 .4-5.8 1.2c-1.8.8-3.4 1.9-4.7 3.2c-1.3 1.4-2.4 2.9-3.2 4.8c-.8 1.8-1.2 3.8-1.2 5.8c0 2.1.4 4 1.2 5.8c.8 1.8 1.8 3.4 3.2 4.8c1.3 1.4 2.9 2.4 4.7 3.2c1.8.8 3.7 1.2 5.8 1.2c2.5 0 4.8-.5 6.8-1.6s3.8-2.6 5.1-4.4l-3.6-2.7c-.9 1.4-2.1 2.5-3.6 3.3c-1.5.8-3.1 1.2-4.8 1.2c-1.4 0-2.7-.3-4-.9c-1.2-.6-2.3-1.4-3.3-2.3c-.9-1-1.7-2.1-2.2-3.4s-.8-2.7-.8-4.2s.3-2.9.8-4.2s1.3-2.5 2.2-3.5"/></g></svg>
            <p style="margin-left: 20px;">2023, RieraTex</p>
            <p style="margin-left: 20px;">All Rights Reserved.</p>
        </div>
        <div class="social-icons">
            <svg style="margin-right: 4px;" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 1024 1024"><path fill="currentColor" d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm215.3 337.7c.3 4.7.3 9.6.3 14.4c0 146.8-111.8 315.9-316.1 315.9c-63 0-121.4-18.3-170.6-49.8c9 1 17.6 1.4 26.8 1.4c52 0 99.8-17.6 137.9-47.4c-48.8-1-89.8-33-103.8-77c17.1 2.5 32.5 2.5 50.1-2a111 111 0 0 1-88.9-109v-1.4c14.7 8.3 32 13.4 50.1 14.1a111.13 111.13 0 0 1-49.5-92.4c0-20.7 5.4-39.6 15.1-56a315.28 315.28 0 0 0 229 116.1C492 353.1 548.4 292 616.2 292c32 0 60.8 13.4 81.1 35c25.1-4.7 49.1-14.1 70.5-26.7c-8.3 25.7-25.7 47.4-48.8 61.1c22.4-2.4 44-8.6 64-17.3c-15.1 22.2-34 41.9-55.7 57.6z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32 32"><path fill="currentColor" d="M11.469 5C7.918 5 5 7.914 5 11.469v9.062C5 24.082 7.914 27 11.469 27h9.062C24.082 27 27 24.086 27 20.531V11.47C27 7.918 24.086 5 20.531 5zm0 2h9.062A4.463 4.463 0 0 1 25 11.469v9.062A4.463 4.463 0 0 1 20.531 25H11.47A4.463 4.463 0 0 1 7 20.531V11.47A4.463 4.463 0 0 1 11.469 7zm10.437 2.188a.902.902 0 0 0-.906.906c0 .504.402.906.906.906a.902.902 0 0 0 .907-.906a.902.902 0 0 0-.907-.906zM16 10c-3.3 0-6 2.7-6 6s2.7 6 6 6s6-2.7 6-6s-2.7-6-6-6zm0 2c2.223 0 4 1.777 4 4s-1.777 4-4 4s-4-1.777-4-4s1.777-4 4-4z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"><path fill="currentColor" d="M15.12 5.32H17V2.14A26.11 26.11 0 0 0 14.26 2c-2.72 0-4.58 1.66-4.58 4.7v2.62H6.61v3.56h3.07V22h3.68v-9.12h3.06l.46-3.56h-3.52V7.05c0-1.05.28-1.73 1.76-1.73Z"/></svg>
        </div>
</div>
    
</footer>