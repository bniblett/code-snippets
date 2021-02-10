#  ---------------------------------------------------------------------------
#  .bash_profile example script for MAC
#
#  Description:  This file holds all my BASH configurations and aliases
#
#  Sections:
#  1.  Environment Configuration
#  2.  GIT Enhancements
#  3.  Make Terminal Better (remapping defaults and adding functionality)
#  4.  File and Folder Management
#  5.  NPM
#  6.  Docker Enhancements
#
#  ---------------------------------------------------------------------------

#   -------------------------------
#   1. ENVIRONMENT CONFIGURATION
#   -------------------------------

alias dpruneall='yes | docker container prune && yes | docker image prune && ye$
export NVM_DIR=~/.nvm
source $(brew --prefix nvm)/nvm.sh'

#   -------------------------------
#   2. GIT ENHANCEMENTS
#   -------------------------------

parse_git_branch() {
  git branch 2> /dev/null | sed -e '/^[^*]/d' -e 's/* \(.*\)/ (\1)/'
}

export PS1="\u@\h \W\[\033[32m\]\$(parse_git_branch)\[\033[00m\] $ "

#alias gf='git fetch'
#alias gco='git checkout'
#alias gpull='git pull'
#alias gpush='git push'

#   -----------------------------
#   3. MAKE TERMINAL BETTER
#   -----------------------------

#cd() { builtin cd "$@"; ll; }               # Always list directory contents upon 'cd'
alias cd..='cd ../'                         # Go back 1 directory level (for fast typers)
alias ..='cd ../'                           # Go back 1 directory level
alias ...='cd ../../'                       # Go back 2 directory levels
alias .3='cd ../../../'                     # Go back 3 directory levels
alias .4='cd ../../../../'                  # Go back 4 directory levels
alias .5='cd ../../../../../'               # Go back 5 directory levels
alias .6='cd ../../../../../../'            # Go back 6 directory levels
alias ~="cd ~"                              # ~: Go Home
alias .wk='cd ~/projects'                   # Go to projects
alias .ps='cd ~/personal'                   # go to personal

#   -------------------------------
#   4. FILE AND FOLDER MANAGEMENT
#   -------------------------------

zipf () { zip -r "$1".zip "$1" ; }          # zipf:         To create a ZIP archive of a folder
alias numFiles='echo $(ls -1 | wc -l)'      # numFiles:     Count of non-hidden files in current dir
alias make1mb='mkfile 1m ./1MB.dat'         # make1mb:      Creates a file of 1mb size (all zeros)
alias make5mb='mkfile 5m ./5MB.dat'         # make5mb:      Creates a file of 5mb size (all zeros)
alias make10mb='mkfile 10m ./10MB.dat'      # make10mb:     Creates a file of 10mb size (all zeros)


#   -------------------------------
#   5. NPM
#   -------------------------------

export NPM_TOKEN=

#   -------------------------------
#   6. Docker Enhancements
#   -------------------------------
alias sdcu 'docker-compose -f docker-compose-dev.yml up --build'

