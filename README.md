# Aeon Quiz Module

Custom quiz activity module plugin for Moodle 5.2.

## Moodle Component

| Key | Value |
|---|---|
| **Component** | `mod_aeonquiz` |
| **Type** | Activity module (mod) |
| **Requires** | Moodle 5.2+ |
| **Status** | Alpha (v0.1.0) |

## File Structure

```
aeon-lms-mod-quiz/
├── version.php                  # Plugin metadata
├── lib.php                      # CRUD functions (add/update/delete instance)
├── lang/en/
│   └── mod_aeonquiz.php         # Language strings
├── classes/                     # PHP classes (TODO)
├── db/
│   ├── install.xml              # DB schema (TODO)
│   ├── upgrade.php              # Migration (TODO)
│   └── mobile.php               # Mobile app support (TODO)
├── .github/workflows/
│   └── deploy.yml               # CI/CD pipeline
└── README.md
```

## Local Development

```bash
# 1. Clone repo
cd /path/to/lab/aeon-lms-plugins
git clone https://github.com/lookmedia-tech/aeon-lms-mod-quiz.git

# 2. Mount ke Docker (edit docker-compose.yml)
# Tambahkan volume mount:
#   - ./aeon-lms-mod-quiz:/var/www/html/mod/aeonquiz:delegated

# 3. Restart container
cd /path/to/lab/aeon-lms-web
docker compose restart moodle

# 4. Install mod di Moodle
# Site administration → Notifications → upgrade

# 5. Akses di browser
# http://localhost/course/view.php?id=X → Add activity → Aeon Quiz

# 6. Edit file → langsung reflected di container
# Cek log: docker compose logs -f moodle
```

## Key Functions (lib.php)

| Function | Description |
|---|---|
| `aeonquiz_add_instance()` | Called when a new quiz is created |
| `aeonquiz_update_instance()` | Called when quiz settings are updated |
| `aeonquiz_delete_instance()` | Called when a quiz is deleted |

## Deployment

Push ke `main` → auto-deploy ke staging server via CI/CD.

| Detail | Value |
|---|---|
| Server | `aeon.lookmedia.co.id` |
| Remote path | `/opt/aeon-lms-web/plugins/mod_aeonquiz/` |
| Post-deploy | `docker compose restart moodle` |
| Trigger | Push ke `main` branch |

## Language Strings

| Key | Value |
|---|---|
| `pluginname` | Aeon Quiz |
| `quiz` | Quiz |
| `questions` | Questions |
| `settings` | Settings |
| `startquiz` | Start Quiz |
| `submitquiz` | Submit Quiz |

## Next Steps

- [ ] Implement quiz creation UI
- [ ] Add question management
- [ ] Add quiz settings (timing, grading, etc.)
- [ ] Add results tracking
- [ ] Create `db/install.xml` for DB tables
- [ ] Add `db/mobile.php` for mobile app support
- [ ] Write PHPUnit tests

## CI/CD Setup (GitHub Secrets Required)

| Secret | Description |
|---|---|
| `SSH_PRIVATE_KEY` | SSH private key for deployment |
| `SERVER_USER` | SSH username for server |
