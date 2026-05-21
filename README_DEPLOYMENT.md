# Game Store Inventory - Railway Deployment Guide

## Files Needed for Railway Deployment

### Essential Files:
1. **Procfile** - Specifies how to run the application
2. **composer.json** - PHP dependencies and project metadata
3. **.env.example** - Environment variables template
4. **.gitignore** - Files to exclude from git
5. **config/database.php** - Database configuration with env var support
6. **railway.json** - Railway-specific configuration (optional)

### Project Files (included automatically):
- `public/` - Web root with index.php
- `controllers/` - Application logic
- `models/` - Database models
- `views/` - HTML templates
- `dp.sql` - Database schema

## Deployment Steps

### 1. **Push to GitHub**
```bash
git init
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/yourusername/game-inventory.git
git push -u origin main
```

### 2. **Connect to Railway**
- Go to [Railway.app](https://railway.app)
- Click "Create New Project"
- Select "Deploy from GitHub"
- Authorize and select your repository

### 3. **Set Environment Variables**
In Railway dashboard, go to Variables and add:
```
DB_HOST=your-mysql-host
DB_PORT=3306
DB_NAME=game_inventory
DB_USER=your-db-user
DB_PASS=your-db-password
```

### 4. **Set Up MySQL Database**
- Add MySQL plugin from Railway dashboard
- Railway will automatically set DB connection variables
- Or use an external MySQL service (Planetscale, AWS RDS, etc.)

### 5. **Run Database Setup**
After deployment, SSH into your Railway app and run:
```bash
mysql -h$DB_HOST -u$DB_USER -p$DB_PASS -e "source dp.sql"
```

Or import `dp.sql` through your database management tool.

## Important Notes

- **Public Directory**: Railway serves from `public/` folder (see Procfile)
- **PHP Version**: Requires PHP 8.0+ (configured in composer.json)
- **Database**: Use Railway's MySQL plugin OR configure external MySQL
- **Document Root**: Set to `public/` for security

## Troubleshooting

- Check Railway logs: `railway logs`
- Verify variables: `railway variables`
- Test locally with `.env` file before deploying
