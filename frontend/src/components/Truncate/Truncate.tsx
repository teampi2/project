import * as React from 'react'
import Typography, { TypographyProps } from '@mui/material/Typography'

interface TruncateProps extends TypographyProps {
  width: number | string
  children: React.ReactNode
}

export function Truncate(props: TruncateProps) {
  const { width, sx, children, ...rest } = props

  return (
    <Typography
      noWrap
      sx={{
        width: width,
        textOverflow: 'ellipsis',
        overflow: 'hidden',
        ...sx,
      }}
      {...rest}
    >
      {children}
    </Typography>
  )
}
