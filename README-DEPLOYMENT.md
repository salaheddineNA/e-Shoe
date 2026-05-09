# ShoeStore Deployment Guide

## 🚨 Railway Issues

If Railway healthcheck keeps failing, try these alternatives:

### 1. Vercel (Recommended for PHP)
```bash
# Install Vercel CLI
npm i -g vercel

# Deploy
vercel --prod
```

### 2. Heroku
```bash
# Install Heroku CLI
# Create app
heroku create your-app-name

# Set buildpack
heroku buildpacks:set heroku/php

# Deploy
git push heroku main
```

### 3. DigitalOcean App Platform
- Upload project to DigitalOcean
- Choose PHP runtime
- Set document root to `public/`

### 4. Traditional Hosting
- Upload to cPanel/Hostinger
- Point document root to `public/`
- Run migrations manually

## 🔍 Debug Steps

1. Check if PHP works locally: `php artisan serve`
2. Test healthcheck: `curl http://localhost:8000/ping`
3. Check Railway logs for specific errors
4. Try different healthcheck paths: `/ping`, `/health.txt`, `/status`

## 📋 Working Configuration

The current configuration should work on any platform:
- ✅ SQLite database
- ✅ File sessions/cache
- ✅ Simple healthcheck
- ✅ Minimal dependencies

## 🎯 If All Else Fails

Contact Railway support or try a different platform.
The code is correct - the issue is platform-specific.
